import "./bootstrap";
import Alpine from "alpinejs";
import "./alpine/navbar";
import "./alpine/store";
import { createIcons, Menu, Moon, Sun } from "lucide";

// creating lucide-icons
createIcons({
    icons: {
        Menu,
        Moon,
        Sun,
    },
});

window.Alpine = Alpine;

Alpine.start();

export default Alpine;
