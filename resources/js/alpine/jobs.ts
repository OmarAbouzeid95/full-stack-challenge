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

interface JobsData {
    init: () => void;
    filter: () => void;
    fetchJobs: () => void;
    toggleFilters: () => void;
    clearFilters: () => void;
    isLoading: () => boolean;
    jobTypes: string[];
    salaries: number[];
    search: string;
    type: "Hybrid" | "In-person" | "Remote" | "";
    location: string;
    filtersApplied: boolean;
    showFilters: boolean;
    salary: number;
    loading: boolean;
    error: unknown;
    page: number;
    jobs: JobPosting[];
}

const jobs: JobsData = {
    init() {
        this.fetchJobs();
    },
    fetchJobs() {
        if (this.loading || this.filtersApplied) return;
        this.loading = true;
        axios
            .get(`/api/job-postings?page=${this.page}`)
            .then((res) => {
                this.jobs = [...this.jobs, ...res.data.data];
                this.page++;
                this.loading = false;
            })
            .catch((error) => {
                console.error("error fetching jobs: ", error);
                this.error = error;
                this.loading = false;
            });
    },
    filter() {
        this.filtersApplied = true;
        axios
            .post("api/job-postings/filter", {
                title: this.search,
                type: this.type !== "" ? this.type : undefined,
                salary: this.salary ?? undefined,
                location: this.location,
            })
            .then((res) => {
                this.jobs = res.data.data;
                this.loading = false;
            })
            .catch((error) => {
                this.error = error;
                this.loading = false;
            });
    },
    isLoading() {
        return this.loading;
    },
    toggleFilters() {
        this.showFilters = !this.showFilters;
    },
    clearFilters() {
        if (!this.filtersApplied) return;
        this.search = "";
        this.type = "";
        this.salary = 0;
        this.location = "";
        this.page = 1;
        this.filtersApplied = false;
        this.jobs = [];
        this.fetchJobs();
    },
    jobTypes: ["Remote", "Hybrid", "In-person"],
    salaries: new Array(10).fill(0).map((_, index) => ++index * 10000),
    showFilters: false,
    filtersApplied: false,
    search: "",
    type: "",
    salary: 0,
    location: "",
    loading: false,
    error: undefined,
    page: 1,
    jobs: [],
};

Alpine.data("jobs", () => jobs);
