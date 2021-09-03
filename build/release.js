const shell = require("shelljs");
const path = require("path");
const fs = require("fs");
const archiver = require("archiver");
const { log, error: logError } = console;
const pjson = require("../package.json");
const chalk = require("chalk");

const themesPath = path.resolve(path.dirname(__dirname), "../");
const workingPath = path.resolve(themesPath, "__themebuild");
const srcPath = path.resolve(path.dirname(__dirname));
const fileName = `${pjson.name}-${pjson.version}.zip`;
const filePath = path.resolve(themesPath, fileName);

log(`${chalk.yellowBright("Building your project...")}`);

if(fs.existsSync(workingPath)){
    shell.rm("-rf", workingPath);
}

if(fs.existsSync(filePath)){
    shell.rm("-rf", filePath);
}

shell.mkdir(workingPath);
shell.cp("-r", path.resolve(srcPath, "*"), workingPath);

const toDelete = [
    ".git*",
    "build",
    "node_modules",
    "src",
    "composer*",
    "Gruntfile.js",
    "package*",
    "webpack*",
    "README*",
    "LICENSE*"
];
toDelete.forEach((del) => {
    shell.rm("-rf", path.resolve(workingPath, del));
});

shell.touch(path.resolve(workingPath, "index.php"));
shell.touch(path.resolve(workingPath, "functions.php"));
shell.cp(path.resolve(srcPath, "resources/style.css"), workingPath);

indexContent = `
// Leave me alone! And don't delete me!
`;
fs.writeFile(path.resolve(workingPath, "index.php"), indexContent);

functionsContent = `
<?php
include_once(dirname(__FILE__)."/resources/functions.php");
unlink(dirname(__FILE__)."/functions.php");
unlink(dirname(__FILE__)."/index.php");
unlink(dirname(__FILE__)."/style.css");
?>
`;
fs.writeFile(path.resolve(workingPath, "functions.php"), functionsContent);

const output = fs.createWriteStream(filePath);
const archive = archiver("zip", {
    zlib: {
        level: 9
    }
});

output.on("close", () => {
    shell.rm("-rf", workingPath);
    var fileSize = ((archive.pointer()/1000)/1000).toFixed(1);
    log(`${chalk.blueBright("Final zip file created with " + fileSize + "MB")}`);
    log(`${chalk.blueBright("You can find your final ZIP file here: " + filePath)}`);
    log(`${chalk.greenBright("Done! :-)")}`);
});
output.on('end', function() {
    console.log('Data has been drained');
});
archive.on('warning', function(err) {
    if (err.code === 'ENOENT') {
        logError(err);
    } else {
        throw err;
    }
});
archive.on('error', function(err) {
    throw err;
});

archive.pipe(output);
archive.directory(workingPath, pjson.name);
archive.finalize();