ARG TAG=22-alpine
FROM node:$TAG

# Temporary fix ref: https://github.com/nodejs/node/issues/62425#issuecomment-4200715930
RUN npm install -g npm@10.9.8
RUN npm install -g npm@^11.0.0

WORKDIR /app/buildchain/

CMD ["run build"]

ENTRYPOINT ["npm"]
