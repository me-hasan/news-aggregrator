FROM  node:14-alpine as build
WORKDIR /app
COPY package.json .
RUN npm install --silent
COPY . .
RUN npm run build

FROM nginx:latest
COPY --from=build  /app/build /usr/share/nginx/html
COPY ./default.conf /etc/nginx/conf.d/
