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
} from "lucide";

// creating lucide-icons
createIcons({
    icons: {
        Menu,
        ArrowUpRight,
        LoaderCircle,
        Moon,
        Sun,
    },
});

Alpine.data("jobPostings", () => ({
    init() {
        axios.get("/api/job-postings").then((res) => {
            this.jobs = res.data.data;
            this.pageNumber++;
        });
    },
    pageNumber: 1,
    jobs: [],
}));

window.Alpine = Alpine;

Alpine.start();

export default Alpine;
