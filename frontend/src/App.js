import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Portal from "./pages/Portal";
import Login from "./pages/Login";
import Register from "./pages/Register";
import PrivateRoute from "./components/PrivateRoute";
import PublicRoute from "./components/PublicRoute";
import useAuthCheck from "./hooks/useAuthCheck";
import Dashboard from "./pages/dashboard/Dashboard";
import Preference from "./pages/dashboard/Preference";
import PreferenceForm from "./pages/dashboard/PreferenceForm";

function App() {
    const authChecked = useAuthCheck();

    return !authChecked ? (
        <div>Checking authentication....</div>
    ) : (
        <Router>
            <Routes>
                <Route
                    path="/"
                    element={
                        <PublicRoute>
                            <Portal />
                        </PublicRoute>
                    }
                />
                <Route
                    path="/login"
                    element={
                        <PublicRoute>
                            <Login />
                        </PublicRoute>
                    }
                />
                <Route
                    path="/register"
                    element={
                        <PublicRoute>
                            <Register />
                        </PublicRoute>
                    }
                />
                <Route
                    path="/dashboard"
                    element={
                        <PrivateRoute>
                            <Dashboard />
                        </PrivateRoute>
                    }
                />
                <Route
                    path="/preference"
                    element={
                        <PrivateRoute>
                            <Preference />
                        </PrivateRoute>
                    }
                />
                <Route
                    path="/add-preference"
                    element={
                        <PrivateRoute>
                            <PreferenceForm />
                        </PrivateRoute>
                    }
                />
            </Routes>
        </Router>
    );
        

}

export default App;
