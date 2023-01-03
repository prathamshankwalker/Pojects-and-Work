from cProfile import run
from operator import truediv
from typing import no_type_check
import pygame
import random
import math
from pygame import K_SPACE, KEYDOWN, mixer



#initialising pygame
pygame.init()

#making screen for game(height,width)
screen=pygame.display.set_mode((800,600))

#title for game window
pygame.display.set_caption("Space Invaders")

#icon for game
icon=pygame.image.load('spaceship2.png')
pygame.display.set_icon(icon)

#player
playerImg=pygame.image.load('resize2.png')
playerX=370
playerY=480

playerX_change=0




#enemy
enemyImg=[]
enemyX=[]
enemyY=[]
enemyX_change=[]
enemyY_change=[]
no_of_enemy=6

#score
score_value=0
font=pygame.font.Font('freesansbold.ttf',32)
textX=10
textY=10

#game over text
over_font=pygame.font.Font('freesansbold.ttf',64)

def game_over_text():
    over=font.render("GAME OVER",True,(255,255,255))
    screen.blit(over,(270,250))

    score =font.render("Score : "+ str(score_value),True,(255,255,255))
    screen.blit(score,(270,280))

    



def show_score(x,y):
    score=font.render("Score : "+ str(score_value),True,(255,255,255))
    screen.blit(score,(x,y))

for i in range(no_of_enemy):
    enemyImg.append(pygame.image.load('monster.png'))

    enemyX.append(random.randint(0,735))
    enemyY.append(random.randint(50,150))

    enemyX_change.append(0.9)
    enemyY_change.append(40)


#bullet
bulletImg=pygame.image.load('bullet.png')
bulletX=0
bulletY=480

bulletX_change=0
bulletY_change=1.1
#ready--cant see the bullet
#fire--bullet is moving
bullet_state="ready"

def player(x,y):
    screen.blit(playerImg,(x,y))
    #blit means to draw
    #arguments- player image,(x,y)coordinates
def enemy(x,y,i):
    screen.blit(enemyImg[i],(x,y))



def bullet_fire(x,y):
    global bullet_state
    bullet_state="fire"
    screen.blit(bulletImg,(x+16,y+10))

#background image

background_img=pygame.image.load('back.jpg')


#collision
def iscollision(enemyX,enemyY,bulletX,bulletY):
    a=(enemyX,enemyY)
    b=(bulletX,bulletY)
    dist=math.dist(a,b)
    if dist<27:
        return True
    else :
        return False
intro=True
running=True
#game loop
start_t=True

# mixer.music.load('intro.mp3')
# mixer.music.play(intro)

start_img=pygame.image.load('start_image_final2.png')
while start_t:
    screen.fill((0,0,0))
    screen.blit(start_img,(0,0))
     
    for event in pygame.event.get():
        if event.type==pygame.QUIT:
            start_t=False
            running=False
        if event.type==pygame.KEYDOWN:
             if event.key==pygame.K_SPACE:
                intro=False
                start_t=False
                running=True
             else:continue
    pygame.display.update()    

#background music
mixer.music.load('background.mp3')
mixer.music.play(-1)

while running:
    
    #screen backround RGB-red green blue
    screen.fill((0,0,0))
    screen.blit(background_img,(0,0))
    
    

    for event in pygame.event.get():
        if event.type==pygame.QUIT:
            running=False
    #if keystroke is pressed, check whether its left or right   
        if event.type==pygame.KEYDOWN:

            if event.key==pygame.K_LEFT: 
                playerX_change= -0.9
            if event.key==pygame.K_RIGHT:
                playerX_change= +0.9
            if event.key==pygame.K_SPACE:
                if bullet_state is "ready":
                    bullet_sound=mixer.Sound('laser.wav')
                    bullet_sound.play()
                    bulletX=playerX
                    bullet_fire(bulletX,bulletY)
                
        if event.type==pygame.KEYUP:#keyup true if key is released
            if event.key==pygame.K_LEFT or event.key==pygame.K_RIGHT:
                playerX_change= 0
                


    playerX+=playerX_change

    #boundaries for spaceship
    if playerX<=0:
        playerX=0
    elif playerX >=736:
        playerX=736


    for i in range (no_of_enemy):

        #Game over
        if enemyY[i]>440:
            for j in range(no_of_enemy):
                enemyY[j]=2000

            game_over_text()
            break
        
        enemyX[i]+=enemyX_change[i]
        if enemyX[i]<=0:
            # enemyX_change[i]=enemyX_change[i]+0.5
            enemyX_change[i]=0.7
            enemyY[i]+=enemyY_change[i]
        elif enemyX[i] >=736:
            
            # enemyX_change[i]=enemyX_change[i]-0.5

            enemyX_change[i]=-0.7
            enemyY[i]+=enemyY_change[i]
    
    #collision
        collision=iscollision(enemyX[i],enemyY[i],bulletX,bulletY)
        if collision:
            enemy_sound=mixer.Sound('blood.wav')
            enemy_sound.play()
            enemyX[i]=random.randint(0,735)
            enemyY[i]=random.randint(50,150)
            score_value+=1
            
            bulletY=480
            bullet_state="ready"
    
        enemy(enemyX[i],enemyY[i],i)




#bullet movement
    if bulletY<=0:
        bulletY=480
        bullet_state="ready"
    if bullet_state is "fire":
        bullet_fire(bulletX,bulletY)
        bulletY-=bulletY_change


    player(playerX,playerY)
    show_score(textX,textY)
    pygame.display.update()    
