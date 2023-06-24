export default function NewsItem({name, description, category, language, country}) {
    return (
        <div
            className="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none"
            to="/"
        >
            <div className="w-full pb-2 hidden md:block">
                <div className="flex justify-between">
                    <span className="block ml-2 font-semibold text-gray-600">
                        {name}
                    </span>
                    <span className="block ml-2 text-sm text-gray-600">
                        {description}
                    </span>
                </div>
                <span className="block ml-2 text-sm text-gray-600">
                    {category}
                </span>
            </div>
        </div>
    );
}
