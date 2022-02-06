# ServerClassProject : 2021 2학기 서버 구축 프로젝트

## 프로젝트 정보 ##
```
Developer | 정진오, 조유찬
Language  | html, css, js, php
Tool      | VSCODE
```

## 프로젝트 개요 ##

사용자 계정에 따라 사용자가 입력한 텍스트(포트폴리오)를 실시간으로 저장해주는 웹사이트

유사품 : Notion

![image](https://user-images.githubusercontent.com/66864237/152684953-b9f33e29-7f51-4838-96f1-4d598aead047.png)


## 프로젝트 설명 ##

### 회원 가입 ###
> ![image](https://user-images.githubusercontent.com/66864237/152684986-d89cd401-86fc-4c53-bb5c-dbedeb1e9814.png)
> 
> * Email은 중복 가능함

### 로그인 ###
> ![image](https://user-images.githubusercontent.com/66864237/152685046-449145aa-8945-4002-96f3-dfedb744f0c2.png)
> 
> * 로그인 성공 시 개인 세션 입장, 실패 시 alert

### 로그아웃 ###
> ![image](https://user-images.githubusercontent.com/66864237/152685089-19ff374e-6e81-4b2b-ad77-1ab83b300c47.png)
>
> * 로그아웃 버튼 클릭 시 개인 세션 파괴
> * 세션은 파괴되어도 실시간으로 db에 데이터를 저장하니 데이터 손실은 없음

### 텍스트 입력 ###
> ![image](https://user-images.githubusercontent.com/66864237/152685135-995f0076-3fa2-4d9b-957b-725169f14fe6.png)
>
> * 텍스트를 입력하면 실시간으로 연결된 db에 데이터를 저장
> * 이후 같은 세션에 다시 로그인 할 시 db에서 동일한 데이터를 불러옴
