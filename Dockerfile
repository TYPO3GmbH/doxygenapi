FROM alpine:3.12
RUN apk add --no-cache doxygen
WORKDIR /mnt/app
ENTRYPOINT ["doxygen"]
