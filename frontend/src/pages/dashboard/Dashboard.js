import Navigation from "../../components/dashboard/Navigation";
import NewsFeed from "../../components/dashboard/NewsFeed";


export default function Dashboard() {
    return (
        <div>
            <Navigation />
            <div className="mx-auto mt-1">
                <div className="min-w-full border rounded flex">
                    <NewsFeed/>
                </div>
            </div>
        </div>
    );
}
