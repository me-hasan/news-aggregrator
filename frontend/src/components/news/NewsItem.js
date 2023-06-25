export default function NewsItem({id, name, description, category, language, country}) {
    return (
        <div classNameNameNameName="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
            <div classNameNameNameName="w-full pb-2">
                <section>
                    <article className="bg-white shadow rounded p-4 mb-4">
                        <h2 className="text-xl font-bold mb-2">{id}. {name}</h2>
                        <p className="text-gray-600">{description}</p>
                        <div className="flex flex-wrap">
                            <span className="bg-green-200 text-gray-700 px-2 py-1 rounded-full text-sm mr-2 mb-2"><span className="font-bold">Category:</span> {category}</span>
                            <span className="bg-yellow-200 text-gray-700 px-2 py-1 rounded-full text-sm mr-2 mb-2"><span className="font-bold">Language:</span> {language}</span>
                            <span className="bg-blue-200 text-gray-700 px-2 py-1 rounded-full text-sm mr-2 mb-2"><span className="font-bold">Country:</span> {country}</span>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    );
}
