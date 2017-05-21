#include <stdio.h>
#include <string.h>
#include <stdlib.h>

#define CONST "This is a very secret message which should not be exposed to public. This is a very secret message which should not be exposed to public. This is a very secret message which should not be exposed to public. This is a very secret message which should not be exposed to public."


void printBuffer(char* buffer, size_t length);
void bufferOverReadUsingStack(char* input, size_t length);
void bufferOverReadUsingHeap(char* input, size_t length);


int main(int argc, char* argv[]) {
    if (argc < 3) return 1;

    char* input = argv[2];
    size_t length = atoi(argv[1]);

    bufferOverReadUsingHeap(input, length);

    printf("\n==========================================================================================\n\n");

    bufferOverReadUsingStack(input, length);

}

void printBuffer(char* buffer, size_t length) {
    for (size_t i = 0; i < length; i++) {
        printf("%c", buffer[i]);
    }
    printf("\n");
}

void bufferOverReadUsingStack(char* input, size_t length) {
    {
        char buf[] = CONST;
        char buf2[strlen(buf)];
        strcpy(buf2, buf);
    }

    char buffer[length];
    strcpy(buffer, input);

    printf("Buffer on Stack:\n");
    printBuffer(buffer, length);
}

void bufferOverReadUsingHeap(char* input, size_t length) {
    char* buf = (char*) malloc(sizeof(CONST));
    strcpy(buf, CONST);

    char* buf2 = (char*) malloc(sizeof(buf));
    memcpy(buf2, buf, sizeof(buf));

    free(buf);
    free(buf2);

    char* buffer = (char*) malloc(length);
    strcpy(buffer, input);

    printf("Buffer on Heap:\n");
    printBuffer(buffer, length);
}
