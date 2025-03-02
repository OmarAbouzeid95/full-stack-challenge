import Alpine from "alpinejs";

type Theme = "dark" | "light";
type Role = "user" | "admin";
interface GlobalStore {
    theme: Theme;
    role: Role;
    toggleTheme: () => void;
    makeAdmin: () => void;
    makeUser: () => void;
}

const globalStore: GlobalStore = {
    theme: (localStorage.getItem("theme") as Theme) || "light",
    role: (localStorage.getItem("role") as Role) || "user",
    toggleTheme() {
        this.theme = this.theme === "dark" ? "light" : "dark";
        localStorage.setItem("theme", this.theme);
    },
    makeAdmin() {
        this.role = "admin";
        localStorage.setItem("role", this.role);
    },
    makeUser() {
        this.role = "user";
        localStorage.setItem("role", this.role);
    },
};

Alpine.store("global", globalStore);
