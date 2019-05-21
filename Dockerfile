FROM alpine:3.7
RUN apk add --no-cache doxygen
WORKDIR /mnt/app
ENTRYPOINT ["doxygen"]