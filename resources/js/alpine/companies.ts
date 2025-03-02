import Alpine from "alpinejs";
import axios from "axios";

export interface Company {
    id: number;
    name: string;
    logo: string;
    about: string;
}

Alpine.data("companies", () => ({
    init() {
        this.loading = true;
        axios
            .get("/api/companies")
            .then((res) => {
                this.companies = res.data.data;
                this.loading = false;
            })
            .catch((error) => {
                this.error = error.message;
                this.loading = false;
            });
    },
    error: "",
    loading: false,
    companies: [],
}));
