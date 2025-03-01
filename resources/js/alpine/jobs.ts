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

// const jobPostings = {
//   init() {

//   },
//   jobs: [],
// };

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
