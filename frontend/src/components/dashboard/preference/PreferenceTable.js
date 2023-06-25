import { useSelector } from "react-redux";
import { useGetPreferenceQuery } from "../../../features/preference/preferenceApi";
import Error from "../../ui/Error";
import PreferenceRow from "./PreferenceRow";

export default function PreferenceTable() {
    const { user } = useSelector((state) => state.auth) || {};
    const { id: user_id } = user || {};

    const {
        data: result,
        isLoading,
        isError,
        error,
    } = useGetPreferenceQuery(user_id);

   

    const {data :newsData } = result || []; 

    // decide what to render
    let content = null;
    
    if (isLoading) {
        content = <li className="m-2 text-center">Loading...</li>;
    } else if (!isLoading && isError) {
        content = (
            <li className="m-2 text-center">
                <Error message={error?.data} />
            </li>
        );
        
    } else if (!isLoading && !isError && newsData?.length === 0) {
        content = <li className="m-2 text-center">No news found!</li>;
    } else if (!isLoading && !isError && newsData?.length > 0) {
        content = newsData.map((news, index) => {
            
            const { id,category, language, author} = news;
            
            
            return (
                <tr key={id}>
                    <PreferenceRow id={index+1} category={category} language={language} author={author} />
                </tr>
            );
        });
        
        return content;
    }
    
}
