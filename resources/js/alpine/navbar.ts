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
                name: "About",
                href: "/about",
            },
            {
                name: "Jobs",
                href: "/jobs",
            },
            {
                name: "Dashboard",
                href: "/dashboard",
            },
        ],
        toggle() {
            this.open = !this.open;
        },
    })
);
