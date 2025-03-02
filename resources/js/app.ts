import "./bootstrap";
import Alpine from "alpinejs";
import "./alpine/navbar";
import "./alpine/store";
import "./alpine/jobs";
import "./alpine/companies";
import intersect from "@alpinejs/intersect";

import {
    ArrowUpRight,
    createIcons,
    Menu,
    Moon,
    Sun,
    LoaderCircle,
    Filter,
    FilterX,
    CircleCheck,
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
        CircleCheck,
    },
});

Alpine.plugin(intersect);
window.Alpine = Alpine;

Alpine.start();

export default Alpine;
