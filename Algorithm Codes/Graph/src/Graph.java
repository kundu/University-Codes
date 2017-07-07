/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.PriorityQueue;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;


public class Graph {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Graph g = new Graph();
    }
    
    public static class Heap
    {
    	public int array[];
    	public Heap(int a[])
    	{
    		array=a;
    		
    	}
    	
    	public int[] heapSort()
    	{
    		sort(array);
    		return array;
    	}
	

	public static void printNewArray(int a[]) {
		for (int i = 1; i < a.length; i++) {
			System.out.print(a[i] + " ");
		}
	}

	public static void sort(int a[]) {
		int len = a.length - 1;
		for (int c = 1; c < a.length; c++) {
			maxHeapify(a, len);
			int t = a[1];
			a[1] = a[len];
			a[len] = t;
			len--;
		}
	}

	public static void maxHeapify(int[] a, int len) {
		int count = (len / 2);
		int right, left;
		for (int n = count; n >= 1; n--) {
			right = (n * 2) + 1;
			left = (n * 2);
			if (right > len) {
				if (a[n] < a[left]) {
					int t = a[n];
					a[n] = a[left];
					a[left] = t;
				}
			} else {
				int save = Math.max(a[right], a[left]);
				if (a[right] == save && a[n] <= a[right]) {
					int t = a[n];
					a[n] = a[right];
					a[right] = t;
				} else if (a[left] == save && a[n] <= a[left]) {
					int t = a[n];
					a[n] = a[left];
					a[left] = t;
				}

			}

		}

	}
    }

    public Graph() {

        readFile();
        printList();
        
        key = new int[noOfNodes + 1];
        parent = new int[noOfNodes + 1];
        initGraph(2);
        pushAllNodesIntoQueue(noOfNodes);
        while (!pq.isEmpty()) {
            Integer u = pq.poll();
            System.out.println("u: " + u);
            for (Node v : neighbourList[u]) {
                if (pq.contains(v.to) && v.weight < key[v.to]) {
                    parent[v.to] = u;
                    key[v.to] = v.weight;
                }
            }
        }

        System.out.println("Minimum: " + sumWeights());
        for(int i=1;i<=noOfNodes;i++)
        {
            System.out.println(""+findTree(i, ""));
        }
        kruskal();
    }

    public void readFile() {
        try {
            Scanner scn = new Scanner(new File("Graph.txt"));

            while (scn.hasNext()) {
                noOfNodes = scn.nextInt();
                noOfedges = scn.nextInt();
                System.out.println(" " + noOfNodes + " " + noOfedges);
                neighbourList = (ArrayList<Node>[]) new ArrayList[noOfNodes + 1];;
                for (int j = 0; j < neighbourList.length; j++) {
                    neighbourList[j] = new ArrayList<>();
                }
                int i = 0;
                while (i < noOfedges) {

                    int u = scn.nextInt();
                    int v = scn.nextInt();
                    int w = scn.nextInt();

                    neighbourList[u].add(new Node(v, w));
                    neighbourList[v].add(new Node(u, w));
                    i++;

                }
            }

        } catch (FileNotFoundException ex) {
            ex.printStackTrace();
        }
    }

    public void printList() {
        for (int i = 0; i <= neighbourList.length; i++) {

            if (i + 1 <= neighbourList.length - 1) {
                System.out.print("" + (i + 1));
                for (Node n : neighbourList[i + 1]) {
                    System.out.print("-> " + "(" + n.to + "," + n.weight + ")");
                }
            }
            System.out.println("");
        }
    }

    public void initGraph(int source) {

        for (int i = 0; i <= noOfNodes; i++) {
            key[i] = 999999999;
            parent[i] = -1;
        }
        key[source] = 0;
    }

    public void pushAllNodesIntoQueue(int noOfNodes) {
        for (int i = 1; i <= noOfNodes; i++) {
            pq.add(i);
        }
    }

    public String findTree(int v, String s) {
        
        if (parent[v] != -1) {
            s+=v+"<-";
            s=findTree(parent[v],s);            
        }
        else
        {
         s+=v;   
        }
        return s;
    }

    public int sumWeights() {
        int sum = 0;
        for (int i = 1; i <= noOfNodes; i++) {
            sum += key[i];
        }
        return sum;
    }
    
    public void kruskal()
    {
    	int a[]=sort();
//    	for (int c = 1; c < a.length; c++) {
//			System.out.println(a[c]);
//		}
    	
    	int len=neighbourList.length;
    	String check[]=new String[len-1];
//    	System.out.println("kto "+len);
    	int path[]=new int[len];
//    	for (int i = 0; i <= neighbourList.length; i++) {
//
//            if (i + 1 <= neighbourList.length - 1) {
//                System.out.print("" + (i + 1));
//                for (Node n : neighbourList[i + 1]) {
//                    System.out.print("-> " + "(" + n.to + "," + n.weight + ")");
//                }
//            }
//            System.out.println("");
//        }
    	int b=0;
    	for (int c = 1; c < a.length; c++) {
			int v[]=find(a[c],c);
//			System.out.println(v[0]+" hhfhfhfhf "+v[1]);
			if(path[v[0]]==0 || path[v[1]]==0 )
			{
				path[v[0]]=1; 
				path[v[1]]=1;
//				System.out.println("B= "+b);
				check[b]=""+v[0]+" "+v[1];
				b++;
			}
//			else if(path[v[1]][v[0]]==0)
//			{
//				path[v[1]][v[0]]=1; 
//				System.out.println("B= "+b);
//				check[b]=""+v[0]+" "+v[1];
//				b++;
//			}
    		
		}
    	System.out.println();
    	System.out.println("After krusal");
    	for (int c = 0; c < b-1; c++) {
			System.out.println(check[c]);
		}
    	
    	
    }
    
    public int[]  find(int wt,int c)
    {
    	int count=2;
    	for (int i = 0; i <= neighbourList.length; i++) {

            if (i + 1 <= neighbourList.length - 1) {
//                System.out.print("" + (i + 1));
                for (Node n : neighbourList[i + 1]) {
                	if(wt==n.weight && count>=c){
//                    System.out.print("-> " + "(" + n.to + "," + n.weight + ")");
//                		System.out.println(i+1+"vvvvvv "+n.to);
                    return new int[]{i+1,n.to};
                	}
                	count++;
                }
            }
//            System.out.println("");
        }
    	return new int []{0,0};
    }
    
    public int [] sort()
    {
    	int totalWeightNum=0;
        for (int i = 0; i <= neighbourList.length; i++) {

            if (i + 1 <= neighbourList.length - 1) {
//                System.out.print("" + (i + 1));
//            	totalWeightNum++;
                for (Node n : neighbourList[i + 1]) {
//                    System.out.print("-> " + "(" + n.to + "," + n.weight + ")");
                	totalWeightNum++;
                }
            }
//            System.out.println("");
        }
//        System.out.println("i am totl n of w "+totalWeightNum);
    	
    	int a[]=new int[totalWeightNum+1];
    	int c=1;
    	for (int i = 0; i <= neighbourList.length; i++) {

            if (i + 1 <= neighbourList.length - 1) {
//                System.out.print("" + (i + 1));
//            	totalWeightNum++;
                for (Node n : neighbourList[i + 1]) {
                	a[c]=n.weight;
                	c++;
//                    System.out.print("-> " + "(" + n.to + "," + n.weight + ")");
                	totalWeightNum++;
                }
            }
//            System.out.println("");
        }
    	
    	Heap h=new Heap(a);
    	a=h.heapSort();
    	
    	
    	
    	return a;
    	
    	
    }
    private ArrayList<Node>[] neighbourList;
    private int noOfNodes;
    private int noOfedges;
    int[] key;
    int[] parent;

    PriorityQueue<Integer> pq = new PriorityQueue<>(new Comparator<Integer>() {

        @Override
        public int compare(Integer o1, Integer o2) {
            return key[o2] < key[o1] ? 1 : -1;
        }
    });

}

class Node {

    int to;
    int weight;

    public Node(int to, int weight) {
        this.to = to;
        this.weight = weight;
    }
}



