import { useGetAllNewsQuery } from "../features/allnews/allNewsApi";
import NewsItem from "./news/NewsItem";
import Error from "./ui/Error";


export default function AllNews() {
    
    const {
        data: result,
        isLoading,
        isError,
        error,
    } = useGetAllNewsQuery();

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
