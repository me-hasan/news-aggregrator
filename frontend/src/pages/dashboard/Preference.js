import Error from "../../components/ui/Error";
import { useGetPreferenceQuery } from "../../features/preference/preferenceApi";
import PreferenceTable from "../../components/dashboard/preference/PreferenceTable";
import Navigation from "../../components/dashboard/Navigation";
import { Link } from "react-router-dom";


export default function Preference() {
    
    return (<div>
                <Navigation />
                <div className="mx-auto mx-2 my-2">
                    <br/>   
                    <br/>   
                    <h4 class="mx-5 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">Preferred news category</h4>
                    <br/> 
                    <Link to="/add-preference"><span className="cursor-pointer bg-green-600 text-gray-700 px-2 py-2 text-sm mr-2 mb-2 hover:bg-green-400">Add New</span></Link>
                    <div>
                        <div className="mx-auto mx-2 my-2">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Category
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Language
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Author
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <PreferenceTable />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>)
}
