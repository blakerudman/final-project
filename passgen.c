#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(int argc, char* argv[]){

        int length, upper, num, punc, randomchar, type;

        srand ( time(NULL) );

        if(argc != 5){
        printf("Needs four args\n");
        return 0;
        }

        length = atoi(argv[1]);
        upper = atoi(argv[2]);
        num = atoi(argv[3]);
        punc = atoi(argv[4]);

        char password[length];

        if((num != 0 && num != 1) || (upper !=  0 && upper != 1) || (punc != 0 && punc != 1)){

        printf("Needs Bool args for last 3\n");
        return 0;

        }

        //printf("%d\n%d\n%d\n%d\n", length, upper, num, punc);

        for(int letter = 0; letter < length; letter++){

        //if((upper + num + punc) == 0){
        //type = 0;
        //}else{
        //type = rand() % (upper + num + punc + 1);
        type = rand() % 4;
        
        //printf("%d", type);
        if(type == 3 && punc == 0){
        type = 2;
        }
        if(type == 2 && num == 0){
        type = 1;
        }
        if(type == 1 && upper == 0){
        type = 0;
        }

        //printf("%d", type);

        if(type == 0){
        //lowercase
        randomchar = (rand() %26) + 97;
        }else if(type == 1){
        randomchar = (rand() % 26) + 65;
        }else if(type == 2){
        randomchar = (rand() % 10) + 48;
        }else if(type == 3){
        randomchar = (rand() % 15) + 33;
        }else{
         printf("error\n");
        return 0;
        }

        printf("%c", randomchar);
        }

        printf("\n");
        return 0;
}
