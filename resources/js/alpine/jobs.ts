import Alpine from "alpinejs";
import { Company } from "./companies";
import axios from "axios";

interface JobPosting {
    id: number;
    title: string;
    type: "Hybrid" | "In-person" | "Remote";
    salary: number;
    location: string;
    description: string;
    company: Company;
}

Alpine.data("jobs", () => ({
    init() {
        axios
            .get(`/api/job-postings`)
            .then((res) => {
                this.jobs = res.data.data;
                this.pageNumber++;
                this.loading = false;
            })
            .catch((error) => {
                this.error = error;
                this.loading = false;
            });
    },
    filter() {
        console.log(this.search, this.type, this.salary, this.location);
        // axios
        //     .get(
        //         `api/jobs/filter?search=${this.search}${
        //             this.type !== "" && `&type=${this.type}`
        //         }${this.salary && `&salary=${this.salary}`}
        //     ${this.location !== "" && `&location=${this.location}`}`
        //     )
        //     .then((res) => {
        //         this.jobs = res.data.data;
        //         this.loading = false;
        //     })
        //     .catch((error) => {
        //         this.error = error;
        //         this.loading = false;
        //     });
    },
    toggleFilters() {
        this.showFilters = !this.showFilters;
    },
    jobTypes: ["Remote", "Hybrid", "In-person"],
    salaries: new Array(10).fill(0).map((_, index) => ++index * 1000),
    showFilters: false,
    search: "",
    type: "",
    salary: 0,
    location: "",
    loading: true,
    error: undefined,
    pageNumber: 1,
    jobs: [],
}));
