export default function PreferenceRow({category, language, author}) {
    return (
        <>
            <th scope="col" class="px-6 py-3">
                {category}
            </th>
            <th scope="col" class="px-6 py-3">
                {language}
            </th>
            <th scope="col" class="px-6 py-3">
                {author}
            </th>
        </>
    );
}
