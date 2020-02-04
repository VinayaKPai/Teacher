var nnnn = 5;
var cnt = 0;
var max = 0;
var arr = [];
var bbb = [];
var ixs = [];
var tnc = 0;
var xam = 0;
// CODILY Lesson 1 Task 1

var ar = [];
var ra = [];
var cn,tn,xm = 0;

function binnum (N) {
    console.log(N);
    while (N > 0) {
        var o = N%2;
        ar.push(o);
        N = parseInt(N/2);
        if (o==0) {  //since each element of the array is the mod from binnum function, if element is 0 cn increases
          cn = cn + 1;
        }
        else {  //ie if the mod value in that element is 1, check if cn is already increased, if increased, then that means a sequence of '0's has been counted.
          if (cn>0) {
            max = cn;
            cn = 0;
          }
        }
      }
        console.log(ar);
        var ra = ar.reverse();
        console.log(ra);
        for (var s=0;s<ra.length;s++) {
          if (ra[s]==0) {
              tn += 1;
          }
          else { //ie ra[s] = 1
            if (tn>xm) {
              xm = tn;
            }
            tn = 0;
          }
        }
        console.log("max 0s = " + xm);
        xm = 0;
        ar = [];
        max = 0;
}

// CODILY Lesson 2 Task 1 -  PAINLESS OddOccurrencesInArray

function OddOccurrencesInArray(A) {
  console.log(A);
  A.reduce(function(a,b) {
    if(a==b){
            counter++;
        }
  });

}

// CODILY Lesson 2 Task 2 -  PAINLESS CyclicRotation
function CyclicRotation(A, K) {
    // write your code in JavaScript (Node.js 8.9.4)
    var len = A.length;
    if (len==0) {
         console.log(ar);;
    }

    else {
        for (var v=0;v<K;v++) {
        var nw = A.pop(A[len-1]);
        A.unshift(nw);
        //console.log(A);
        }
    }
        console.log(A);
}
// CODILY Lesson 3 Tasks 1 - PAINLESS FrogJmp
function frogJmp(X, Y, D) {
  console.log(X + " " + Y + " " + D);
  var cnt = 0;
  for (i=X;i<=Y;i+=4) {
    cnt +=1;
    console.log(i + " and cnt =  " + cnt);
  }
  cnt += 1;
  console.log(cnt);
}
// CODILY Lesson 3 Tasks 2 - PAINLESS - PermMissingElem
function permMissingElem(A) {
  var d = 0;
      if (Math.min(A)>1) {
      console.log(1);
        }
        else if (Math.min(A)<1) { //ie is either 0,1 so first test for 0
          console.log(1);
        }
        else {//ie min is 1
         var Z = A.sort(function(a, b){return a - b});
            var N = Z.length;
            if (Z[N-1]==N) {
              console.log(N + 1);
            }
            else {


                  for (p=0;p<Z.length;p++) {
                      if (Z[p] > p+1) {
                           d = (p + 1);
                           console.log(d);
                       }
                  }
              }
              console.log(d);
          }
}
// CODILY Lesson 3 Tasks 3 - PAINLESS - TapeEquilibrium
// CODILY Lesson 4 Task 1 - PAINLESS - PermCheck
function permCheck(A) {
  console.log(A);
  var N = A.length;
var chk, chk1, chk2 = 0;
var D = A.sort(function (a,b) {return a - b;});
console.log(D);
if (D[0]==1) {
    chk = 1;
    console.log("So far good");
}
else { chk += 0; console.log("NOT good");}
if (D[N-1]==N) {
    chk1 = 1;
    console.log("So far good");
}
else { chk1 = 0; console.log("NOT good");}


for (n=0;n<N-1;n++) {
    if (D[n+1] == D[n] + 1) {
        chk2 += 1;
        console.log("So far good" + chk);
    }
    else { chk += 0; console.log("NOT good" + chk);}
}
if (chk==1 && chk1==1 && chk2==N-1)  {
    // return 1;
    console.log("Permutation!");
}
else {
    // return 0;
    console.log("NOT Permutation!");
}
}
// CODILY Lesson 4 Task 2 - PAINLESS - FrogRiverOne
// CODILY Lesson 4 Task 3 - RESPECTABLE - MaxCounters
// CODILY Lesson 4 Task 4 - RESPECTABLE - MissingInteger
function MissingInteger() {
  // var A = [-20557,	78217,	-6769,	44069, 3, -41084,	-23987,	1114,	-72536, 71431,	-9819,	64544,	-48228, 85381,	-83488,	-36291,	84319, 82837,	25973,	95621,	92357, -63553,	-1028,77466,	60637, -13236, 2,	59027,	53581,	3706, -11539,	-57263,	-61988,	-43479, -25555,	-22966,70547,	74019, 27569,	73286,	-62950,	-37137,89019,	15496,	9908,	4, 53618, 52668,	57318,	28130,	48437, -69466,	-70208,	-22980,	-52630, -85508,	-37199,	43423,	374, 1178,	-64341,	30615,	84102, 80346,	-92604,	-98106,	-25521,  -49596,	-36531,	5278,	-18136, -40361, 5, 4006,	39720,	-73307, -1812,	-32951,	8388,	-22010, 91988,	35368, 85781,	93392, 49374,	1362,	63865,	31015, 70030,	-5274,	17934,	47762, -41781,	48436,	-44505,	4620, 38308,	-97494,	61567,	-16903, -46709,	37807,	55894,	-53621, 1];
  var A = [-1,1];
  // var A = [-1];
  var l = A.length;
  console.log(l);
  if (l==0){//empty array
    console.log(1);
  }
  else if (l==1) {//ie array with only 1 item
    if (A[0]<0 || A[0]==0 || A[0]>1) {
      console.log(1);
    }
    else {
      console.log(2);
    }
  }
  else {//ie array has more than 1 item
      var x = Math.max(...A);
      console.log(x);


      if (x<0) {//ie max is negative
        console.log("1");
      }
      else if (x==0) {
        console.log("1");
      }
      else if (x==1) {
            console.log(2);
        }
      else {//ie max is positive
            for (var t=1;t<l;t++) {

              if (!A.includes(t)) {
                console.log(t);
                break;
              }
            }
      }
  }
}


// CODILY Lesson 5 - Task 1 - PassingCars
// CODILY Lesson 5 - Task 2 - GenomicRangeQuery
// CODILY Lesson 5 - Task 3 - MinAvgTwoSlice
// CODILY Lesson 5 - Task 4 - CountDiv
function countDiv(A,B,K) {
  if (A==B) {
      //case 1 A==B>0
      if (A!=0){
          if (K>A) {//K>A&B
            return (0);
          }
          else if (K==A) {//K==A==B
            return (1);
          }
          else if (K<A) {//K is < A & B
            if (A % K == 0) {
              return (A/K);
            }
          }
      }
      else {
      //case 2 A==B==0
              return 0;
      }

  }
  else { // A!=B!=K>0
      //case 1 K<B
      if (K<B) {
          for (var t=A;t<A+K;t++) {
              if (t % K == 0) {
                r = parseInt(t/K);
                //return (t +", " + r);
              }
          }
          for (var u=B-K;u<B;u++) {
              if (u % K == 0) {
                w = parseInt(u/K);
                //return (u +", " + w);
              }
          }
          return (w-r+1);
      }
      else if (K>B) {
      //case 2 K>B
          return 0;
      }
      else {//K++B
          return 1;
      }
  }
}

// CODILY Lesson 6 - Task 1 - MaxProductOfThree PAINLESS
function MaxProductOfThree() {
  var A = [-557,	217,	-769,	69, -984,	-987,	914,	-956, 431,	-989,	649,	-429, 859,	-839,	-929,	819, 837,	973,	959,	929, -553,	-728,776,	607, -136,	597,	531,	306, -139,	-563,	-618,	-439, -255,	-226,547,	749, 279,	736,	-950,	-337,819,	196, 908,	538, 528,	318,	130,	437, -466,	-708,	-980,	-526, -508,	-379,	423,	374, 178,	-641,	305,	802, 846,	-604,	-816,	-521, -496,	-331,	78,	-136, -461,506,	320,	-707, -18,	-351,	88,	-220, 988,	368,	781, 332, 94,	62,	665,	35, 70,	-54,	134,	477, -411,	484,	-405,	46, 383,	-4,	667,	-103, -469,	787,	940,	-531]
  console.log(A);

    var Z = A.sort(function(a,b) {return a - b;});
    console.log(Z);
    var maxi = Z[Z.length-1];
    var indxi = A.indexOf(maxi);
    console.log(maxi + " " + indxi);
    Z.pop();
    console.log(Z);
    var maxii = Z[Z.length-1];
    var indxii = A.indexOf(maxii);
    console.log(maxii + " " + indxii);
    Z.pop();
        console.log(Z);
    var maxiii = Z[Z.length-1];
    var indxiii = A.indexOf(maxiii);
    console.log(maxiii + " " + indxiii);
    console.log(maxi*maxii*maxiii);
    console.log(indxi + ", " + indxii + ", " + indxiii);
  //Scenarios:
  //1. 3 items in Array
    //result will be product of all three
  //2. 4 items in array
    //Options:
      //a. All 4 are -ve
      //b. ALL $ ARE +ve
      //c. 1 +ve, 3 -ve
      //d. 2 +ve 2 -ve
      //e. 3 +ve 1 -ve

}


// CODILY Lesson 10 Task 1 - CountFactors (BASIC) - PAINLESS - CountFactors
function factors(q) {
  console.log(q);

  var r = parseInt(q/2);
  var cnt = 0;
  for (var g=2;g<r;g++) {
    var m = q%g;
    if (m==0) {
      console.log(g);
      cnt +=1;
    }
  }
  console.log(cnt + "factors for " + q);
}
// CODILY Lesson 10 Task 1 - CountFactors (ADVANCED) - PAINLESS - CountFactors
function factorsM(q) {  //q is an array
  console.log(q);
  for (var h=0;h<q.length;h++)  {
    var a = q[h];
    var rr = parseInt(a/2);
    var cnt = 0;
    for (var gr=2;gr<rr;gr++) {
      var mr = a%gr;
      if (mr==0) {
        console.log(gr);
        cnt +=1;
      }
    }
    if (cnt==0) {
      var msg = ", so it is a PRIME number";
    }
    else {
      msg = ", so it is a COMPOSITE number"
    }
    console.log(cnt + "factors for " + a + msg);
  }
}

// CODILY Lesson 10 Task 2 - PAINLESS - MinPerimeterRectangle
function minPerimeterRectangle (lk) {
  console.log(lk);
  var perim = 2*(1+lk);
  var z = lk/2;
  for (var s=1;s<z+1;s++) {
    if (lk%s==0){
      var m = lk/s;
      var chkperim = 2*(m+s);
      if (chkperim<perim) {
        perim = chkperim;
      }
      console.log("Given Area " + lk + ", sides " + s + " and " + m + " AND perimeter " + chkperim);
    }

  }
  console.log("smallest perimeter is " + perim);
}
// CODILY Lesson 10 Task 3 - RESPECTABLE - Peaks

// CODILY Lesson 10 Task 4 - RESPECTABLE - Flags
//
var yourself = {
    fibonacci : function(n) {
        if (n === 0) {
            return 0;
        } else if (n === 1) {
            return 1;
        } else {
            return this.fibonacci(n - 1) +
                this.fibonacci(n - 2);
        }
    }
};

// you can write to stdout for debugging purposes, e.g.
// console.log('this is a debug message');

function solution(A, B, K) {
    // write your code in JavaScript (Node.js 8.9.4)


}
