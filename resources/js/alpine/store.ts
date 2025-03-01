import Alpine from "../app";

// interface GlobalStore {
//     theme: "dark" | "light";
//     user: "admin" | "user";
// }

Alpine.store("global", () => ({
    theme: localStorage.getItem("theme") || "light",
    user: localStorage.getItem("user") || "user",

    toggleTheme() {
        this.theme = this.theme === "dark" ? "light" : "dark";
    },

    toggleUser() {
        this.user = this.user === "admin" ? "user" : "admin";
    },
}));
