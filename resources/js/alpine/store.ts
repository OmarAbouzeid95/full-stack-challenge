import Alpine from "alpinejs";

type Theme = "dark" | "light";
type Role = "user" | "admin";
interface GlobalStore {
    theme: Theme;
    role: Role;
    toggleTheme: () => void;
    toggleRole: () => void;
}

const globalStore: GlobalStore = {
    theme: (localStorage.getItem("theme") as Theme) || "light",
    role: (localStorage.getItem("role") as Role) || "user",
    toggleTheme() {
        this.theme = this.theme === "dark" ? "light" : "dark";
        localStorage.setItem("theme", this.theme);
    },
    toggleRole() {
        this.role = this.role === "admin" ? "user" : "admin";
        localStorage.setItem("role", this.role);
    },
};

Alpine.store("global", globalStore);
