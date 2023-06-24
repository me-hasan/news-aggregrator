import { apiSlice } from "../api/apiSlice";

export const allNewsApi = apiSlice.injectEndpoints({
    endpoints: (builder) => ({
        getAllNews: builder.query({
            query: () => ({
                url: '/all-news',
                method: 'GET',
            }),
        }),
    }),
});


export const { useGetAllNewsQuery } = allNewsApi;
