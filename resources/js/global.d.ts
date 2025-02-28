import { Alpine as AlpineType } from "alpinejs";
import { Axios as AxiosType } from "axios";

// adding alpine and axios types to the window object
declare global {
    interface Window {
        Alpine: AlpineType;
        axios: AxiosType;
    }
}
