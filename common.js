var upVoted = [];
var downVoted = [];

function vote(cardId, id, vote, count) {
	var xmlhttp = new XMLHttpRequest();
	var voteType = (vote >= 0) ? "like" : "unlike";

	var upVotedIndex = upVoted.indexOf(cardId);
	var downVotedIndex = downVoted.indexOf(cardId);

	if (vote >= 0) {
		if (upVotedIndex >= 0) {
			return; // Already upvoted
		} else {
			upVoted.push(cardId);
		}
	} else {
		if (downVotedIndex >= 0) {
			return; // Already down voted
		} else {
			downVoted.push(cardId);
		}
	}
	var buttonId = cardId + "_" + ((vote >= 0) ? "like" : "unlike");
	var prefix = (vote >= 0) ? "<span class='glyphicon glyphicon-thumbs-up'></span> " 
							 : "<span class='glyphicon glyphicon-thumbs-down'></span> ";
	xmlhttp.onreadystatechange=function() {
		document.getElementById(buttonId).innerHTML = prefix + (count + 1);
	}
	xmlhttp.open("GET", "vote.php?id=" + id + "&vote=" + vote, true);
	xmlhttp.send();
}

function shareLink(text) {
  alert("Share Link: www.bolguru.in/result.php?id=" + text);
}