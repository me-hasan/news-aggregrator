import { apiSlice } from "../api/apiSlice";

export const newsFeedApi = apiSlice.injectEndpoints({
    endpoints: (builder) => ({
        getNewsFeed: builder.query({
            query: (id) => ({
                url: `/news-feed/${id}`,
                method: 'GET',
            }),
        }),
    }),
});


export const { useGetNewsFeedQuery } = newsFeedApi;
