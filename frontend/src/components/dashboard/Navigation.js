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
        button = <span className="cursor-pointer" onClick={logout}>Logout</span>;    
    } else {
        button = <Link to="/login"><span className="cursor-pointer">Login</span></Link>;    
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
