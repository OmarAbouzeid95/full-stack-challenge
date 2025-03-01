import "./bootstrap";
import Alpine from "alpinejs";
import { createIcons, Menu, ArrowRight, Globe } from "lucide";

// creating lucide-icons
createIcons({
    icons: {
        Menu,
        ArrowRight,
        Globe,
    },
});

window.Alpine = Alpine;

Alpine.data("nav", () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
}));

Alpine.start();

export default Alpine;
