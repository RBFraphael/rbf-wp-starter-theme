export class MobileDrawer
{
    constructor()
    {
        jQuery(".drawer-overlay").on("click", this.closeDrawer);

        window.openDrawer = this.openDrawer;
        window.closeDrawer = this.closeDrawer;
    }

    openDrawer()
    {
        if(jQuery(".drawer-overlay").hasClass("d-none")){
            jQuery(".drawer-overlay").removeClass("d-none");
        }

        if(!jQuery(".drawer-overlay").hasClass("d-block")){
            jQuery(".drawer-overlay").addClass("d-block");
        }

        jQuery(".drawer").css("left", "0");
    }

    closeDrawer()
    {
        if(jQuery(".drawer-overlay").hasClass("d-block")){
            jQuery(".drawer-overlay").removeClass("d-block");
        }

        if(!jQuery(".drawer-overlay").hasClass("d-none")){
            jQuery(".drawer-overlay").addClass("d-none");
        }

        jQuery(".drawer").css("left", "-270px");
    }
}