import { Link } from "react-router-dom";
import logoImage from "../../assets/images/logo.svg";
import { useDispatch } from "react-redux";
import { userLoggedOut } from "../../features/auth/authSlice";
import useAuth from "../../hooks/useAuth";



export default function Navigation() {
    const dispatch = useDispatch();

    const logout = () => {
        dispatch(userLoggedOut());
        localStorage.clear();
    };
    const isLoggedIn = useAuth();
    let button;
    if (isLoggedIn) {      
        button = (
            <>
                <Link to="/dashboard"><span className="cursor-pointer bg-green-200 text-gray-700 px-2 py-2 rounded-full text-sm mr-2 mb-2 hover:bg-green-400">News Feed</span></Link>
                <Link to="/preference"><span className="cursor-pointer bg-green-200 text-gray-700 px-2 py-2 rounded-full text-sm mr-2 mb-2 hover:bg-green-400">My Preferences</span></Link>
                <Link to="/#"><span className="cursor-pointer bg-green-200 text-gray-700 px-2 py-2 rounded-full text-sm mr-2 mb-2 hover:bg-green-400">Profile</span></Link>
                <span className="cursor-pointer bg-green-200 text-gray-700 px-2 py-2 rounded-full text-sm mr-2 mb-2 hover:bg-green-400" onClick={logout}>Logout</span>
            </>
        );    
    } else {
        button = <Link to="/login"><span className="cursor-pointer bg-green-200 text-gray-700 px-2 py-2 rounded-full text-sm mr-2 mb-2 hover:bg-green-400">Login</span></Link>;    
    }

    return (
        <nav className="border-general sticky top-0 z-40 border-b bg-violet-700 transition-colors">
            <div className="max-w-7xl mx-auto">
                <div className="flex justify-between h-16 items-center">
                    <Link to="/">
                        <img
                            className="h-10"
                            src={logoImage}
                            alt="News Aggregator"
                        />
                    </Link>
                    <ul>
                        <li className="text-white">
                            {button}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}
