import { useNavigate } from "react-router-dom";
import Navigation from "../../components/dashboard/Navigation";
import { useEffect, useState } from "react";
import Error from "../../components/ui/Error";
import { useSavePreferenceMutation } from "../../features/preference/preferenceApi";
import { useSelector } from "react-redux";


export default function PreferenceForm() {
    const { user } = useSelector((state) => state.auth) || {};
    const { id : user_id } = user || {};

    const [category, setCategory] = useState("");
    const [language, setLanguage] = useState("");
    const [country, setCountry] = useState("");
    const [author, setAuthor] = useState("");
    const [error, setError] = useState("");

    

    const [register, { data, isLoading, isSuccess, error: responseError }] =
        useSavePreferenceMutation();
    const navigate = useNavigate();

    useEffect(() => {
        if(isSuccess){
            navigate("/preference");
        }
    }, [data, responseError, navigate, isSuccess]);

    const handleSubmit = (e) => {
        e.preventDefault();

        setError("");
        
        register({
            user_id,
            category,
            language,
            country,
            author,
        });
    };
    return (
        <div>
            <Navigation />
            <div className="mx-auto mx-2 my-2">
             <br/>   
             <br/>   
             <h4 class="mx-5 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">Add preferred news category</h4>
             <br/>   
             
                
            <div class="relative overflow-x-auto">
                <div className="max-w-md w-full">
                    <form className="mt-8 space-y-6" onSubmit={handleSubmit}>
                        <div className="rounded-md shadow-sm -space-y-px">
                            <div>
                                <label htmlFor="Category" className="sr-only">
                                Category
                                </label>
                                <input
                                    id="category"
                                    name="category"
                                    type="Category"
                                    autoComplete="NaCategoryme"
                                    required
                                    className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-violet-500 focus:border-violet-500 focus:z-10 sm:text-sm"
                                    placeholder="Category"
                                    value={category}
                                    onChange={(e) => setCategory(e.target.value)}
                                />
                            </div>

                            <div>
                                <label
                                    htmlFor="Language"
                                    className="sr-only"
                                >
                                    Language
                                </label>
                                <input
                                    id="Language"
                                    name="Language"
                                    type="Language"
                                    autoComplete="Language"
                                    required
                                    className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-violet-500 focus:border-violet-500 focus:z-10 sm:text-sm"
                                    placeholder="Language"
                                    value={language}
                                    onChange={(e) => setLanguage(e.target.value)}
                                />
                            </div>

                            <div>
                                <label
                                    htmlFor="Country"
                                    className="sr-only"
                                >
                                    Country
                                </label>
                                <input
                                    id="Country"
                                    name="Country"
                                    type="Country"
                                    autoComplete="Country"
                                    required
                                    className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-violet-500 focus:border-violet-500 focus:z-10 sm:text-sm"
                                    placeholder="Country"
                                    value={country}
                                    onChange={(e) => setCountry(e.target.value)}
                                />
                            </div>

                            <div>
                                <label htmlFor="Author" className="sr-only">
                                Author
                                </label>
                                <input
                                    id="Author"
                                    name="Author"
                                    type="Author"
                                    autoComplete="Author"
                                    required
                                    className="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-violet-500 focus:border-violet-500 focus:z-10 sm:text-sm"
                                    placeholder="Author"
                                    value={author}
                                    onChange={(e) =>
                                        setAuthor(e.target.value)
                                    }
                                />
                            </div>

                          
                        </div>

                       

                        <div>
                            <button
                                type="submit"
                                className="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-violet-600 hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500"
                                disabled={isLoading}
                            >
                                <span className="absolute left-0 inset-y-0 flex items-center pl-3"></span>
                                Save
                            </button>
                        </div>

                        {error !== "" && <Error message={error} />}
                    </form>
                </div>
            </div>

                
            </div>
        </div>
    );
}
