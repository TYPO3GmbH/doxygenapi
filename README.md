# Doxygen wrapper image

# How to use:

## Prerequisites

- Config directory with `Doxyfile` (and optional resources like footer, header, stylesheet)

## Running

Run it with
`docker run -v path-to-project:/mnt/doxygen -v <path-to-config-dir>:/mnt/doxyconf -v output-path:/mnt/output psychomieze/doxygen /mnt/doxyconf/Doxyfile`

Example (win10):
`docker run -v D:\projects\my-project:/mnt/app -v D:\Play\doxygen:/mnt/doxyconf -v D:\Play\Results:/mnt/output psychomieze/doxygen /mnt/doxyconf/Doxyfile`
