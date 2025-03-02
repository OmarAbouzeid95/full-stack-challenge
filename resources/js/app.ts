import "./bootstrap";
import Alpine from "alpinejs";
import "./alpine/navbar";
import "./alpine/store";
import "./alpine/jobs";
import axios from "axios";
import {
    ArrowUpRight,
    createIcons,
    Menu,
    Moon,
    Sun,
    LoaderCircle,
    Filter,
    FilterX,
} from "lucide";

// creating lucide-icons
createIcons({
    icons: {
        Menu,
        ArrowUpRight,
        LoaderCircle,
        Moon,
        Sun,
        Filter,
        FilterX,
    },
});

window.Alpine = Alpine;

Alpine.start();

export default Alpine;
