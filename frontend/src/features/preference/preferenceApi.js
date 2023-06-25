import { apiSlice } from "../api/apiSlice";

export const preferenceApi = apiSlice.injectEndpoints({
    endpoints: (builder) => ({
        getPreference: builder.query({
            query: (user) => ({
                url: `/preference/${user}`,
                method: 'GET',
            }),
        }),
        getPreferenceById: builder.query({
            query: (id) => ({
                url: `/preference/${id}`,
                method: 'GET',
            }),
        }),
        savePreference: builder.mutation({
            query: (data) => ({
                url: "/preference",
                method: "POST",
                body: data,
            }),
        }),
    }),
});


export const { useGetPreferenceQuery, useGetPreferenceByIdQuery, useSavePreferenceMutation } = preferenceApi;
