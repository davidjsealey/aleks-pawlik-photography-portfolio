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
        const activeClass = 'sub-menu--active'
        this.isActive = false;

        if (this.isTouchDevice()) {
            trigger.addEventListener('click', () => {
                if(!this.isActive) {
                    subMenu.classList.add(activeClass)
                    this.isActive = true;
                } else {
                    subMenu.classList.remove(activeClass)
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