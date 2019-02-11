FROM alpine:3.9

WORKDIR /tmp/src/

RUN apk add --update --no-cache --virtual .build-deps \
		build-base \
		gnupg

RUN wget http://archive.apache.org/dist/httpd/httpd-2.2.22.tar.gz

RUN wget http://archive.apache.org/dist/httpd/httpd-2.2.22.tar.gz.asc

RUN wget http://archive.apache.org/dist/httpd/httpd-2.2.22.tar.gz.sha1

#RUN gpg --keyserver ha.pool.sks-keyservers.net --recv-key 5593BCA960C5442D
#
#RUN gpg --verify httpd-2.2.22.tar.gz.asc httpd-2.2.22.tar.gz

RUN sha1sum -c httpd-2.2.22.tar.gz.sha1

RUN tar xvzf httpd-2.2.22.tar.gz

WORKDIR /tmp/src/httpd-2.2.22

RUN ./configure --prefix=/usr/local/apache2

RUN make -j $(nproc)

RUN make install

CMD ["/usr/local/apache2/bin/apachectl", "-D", "FOREGROUND"]