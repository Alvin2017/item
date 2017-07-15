set names utf8;
drop database if exists liuyan;
create database liuyan charset=utf8;
use liuyan;
create table ban(
	id int primary key auto_increment,
	message varchar(300),
	time datetime
);
insert into ban values(null,"你是最棒的，加油",now()),(null,"在人的一生中，常常会因为拥有而快乐，为失去而悲伤，有时候，不知足的人拥有一切却享受不到。知福的人看似一无所有，却是样样都有。祝朋友周末开心快乐。",now()),(null,"在人的一生中，有两种事应该尽量少干，一是用自己的嘴干扰别人的人生，二是靠别人的脑子思考自己的人生。祝朋友开心快乐。",now()),(null,"在人的一生中，做人求和，做事求精；做人至俭，做事至诚。祝朋友周二开心快乐。",now()),(null,"在人的一生中，生活没有一帆风顺的，只有披荆斩棘才能路路顺。祝朋友周一开心快乐。",now()),(null,"在人的一生中，要活在当下，既不要让过去拖在你后面，也不要让未来让你忧心时，你才能找到生命的理想状态。祝朋友周日开心快乐。",now()),(null,"在人的一生中，只有善待自己，才能幸福无比；只有善待别人，才能快乐无比；只有善待生命，才能健康无比。祝朋友周六开心快乐。",now()),(null,"在人的一生中 人生有起有落，有起有伏，无论你现在是在人生的顶峰，还是在人生的低谷，都是人生必经的一个过程。祝朋友周五开心快乐。",now());