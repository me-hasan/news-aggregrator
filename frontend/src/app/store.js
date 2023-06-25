import { configureStore } from "@reduxjs/toolkit";
import { apiSlice } from "../features/api/apiSlice";
import authSliceReducer from "../features/auth/authSlice";
import allNewsSliceReducer from "../features/allnews/allNewsSlice";
import newsFeedSliceReducer from "../features/newsfeed/newsFeedSlice";
import preferenceSliceReducer from "../features/preference/preferenceSlice";


export const store = configureStore({
    reducer: {
        [apiSlice.reducerPath]: apiSlice.reducer,
        auth: authSliceReducer,
        news: allNewsSliceReducer,
        newsfeed: newsFeedSliceReducer,
        preference: preferenceSliceReducer
    },
    devTools: process.env.NODE_ENV !== "production",
    middleware: (getDefaultMiddlewares) =>
        getDefaultMiddlewares().concat(apiSlice.middleware),
});
