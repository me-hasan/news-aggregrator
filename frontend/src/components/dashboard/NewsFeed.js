import { useSelector } from "react-redux";
import { useGetNewsFeedQuery } from "../../features/newsfeed/newsFeedApi";
import NewsItem from "../news/NewsItem";
import Error from "../ui/Error";


export default function NewsFeed() {
    const { user } = useSelector((state) => state.auth) || {};
    const { id } = user || {};

    const {
        data: result,
        isLoading,
        isError,
        error,
    } = useGetNewsFeedQuery(id);

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
            
            const { id, name, description, category, language, country} = news;
            
            
            return (
                <li key={id}>
                    <NewsItem id={index+1} name={name} description={description} category={category} language={language} country={country} />
                </li>
            );
        });
    }
    
    return <ul>{content}</ul>;
}
