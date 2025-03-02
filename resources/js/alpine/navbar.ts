import Alpine from "alpinejs";

type Link = {
    name: string;
    href: string;
};

interface NavBarProps {
    open: boolean;
    links: Link[];
    toggle: () => void;
}

Alpine.data(
    "nav",
    (): NavBarProps => ({
        open: false,
        links: [
            {
                name: "Jobs",
                href: "/jobs",
            },
            {
                name: "Companies",
                href: "/companies",
            },
            {
                name: "Sign In",
                href: "/sign-in",
            },
        ],
        toggle() {
            this.open = !this.open;
        },
    })
);
