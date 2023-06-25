import AllNews from "../components/AllNews";
import Navigation from "../components/dashboard/Navigation";

export default function Portal() {
    return (
        <div>
            <Navigation />
            <div className="mx-auto mt-1">
                <div className="min-w-full border rounded flex">
                        <AllNews/>
                </div>
            </div>
        </div>
    );
}
