/**
 * Mobile Sub Menu
 */
export class MobileSubMenu {
    /**
     * Instance constructor
     */
    constructor() {
        const menuItemHasChildren = document.querySelector('.menu-item-has-children');
        const trigger = menuItemHasChildren.querySelector('a');
        const subMenu = menuItemHasChildren.querySelector('.sub-menu');
        this.isActive = false;

        if (this.isTouchDevice()) {
            trigger.addEventListener('click', () => {
                if(!this.isActive) {
                    subMenu.style.opacity = "1";
                    subMenu.style.pointerEvents = "all";
                    subMenu.style.maxHeight = '100%'
                    subMenu.style.paddingTop = '20px'
                    this.isActive = true;
                } else {
                    subMenu.style.opacity = "0";
                    subMenu.style.pointerEvents = "none";
                    subMenu.style.maxHeight = '0'
                    subMenu.style.paddingTop = '0'
                    this.isActive = false;
                }
            })
        }
    }

    /**
     * Detect touch devices
     * @return {Boolean} touch check
     */
    isTouchDevice() {
    return (('ontouchstart' in window)
        || (navigator.MaxTouchPoints > 0)
        || (navigator.msMaxTouchPoints > 0));
    }
}