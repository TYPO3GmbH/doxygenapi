FROM alpine:3.12
RUN apk add --no-cache doxygen php7 php7-tokenizer
WORKDIR /mnt/app
ENTRYPOINT ["doxygen"]
