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
    isLoading: () => boolean;
    jobTypes: string[];
    salaries: number[];
    search: string;
    type: "Hybrid" | "In-person" | "Remote" | "";
    location: string;
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
        this.loading = true;
        axios
            .get(`/api/job-postings?page=${this.page}`)
            .then((res) => {
                this.jobs = [...this.jobs, ...res.data.data];
                this.page++;
                this.loading = false;
            })
            .catch((error) => {
                this.error = error;
                this.loading = false;
            });
    },
    filter() {
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
    jobTypes: ["Remote", "Hybrid", "In-person"],
    salaries: new Array(10).fill(0).map((_, index) => ++index * 10000),
    showFilters: false,
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
