import Alpine from "alpinejs";

interface NavBarProps {
    open: boolean;
    toggle: () => void;
}

Alpine.data(
    "nav",
    (): NavBarProps => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
    })
);
