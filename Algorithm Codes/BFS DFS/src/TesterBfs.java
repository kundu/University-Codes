/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.FileNotFoundException;
import java.util.Scanner;

/**
 *
 * @author Rabbani
 */
class GraphInput {
	int vertex;

	public int[][] giveInput() throws FileNotFoundException {
		Scanner sc = new Scanner(System.in);
		java.io.File file = new java.io.File("Graph.txt");
		// int [][]array=new int[0][0];
		// try {

		Scanner s = new Scanner(file);
		System.out.println("plez insert vertex number");
		int i = sc.nextInt();
		System.out.println("--------------------------------------------");
		int j = 0;
		int[][] array = new int[i][i];
		// while(j<array.length){

		while (s.hasNext()) {
			int v1 = s.nextInt();
			int v2 = s.nextInt();
			array[v1][v2] = 1;
			// System.out.println(num);

			// System.out.println(array.length);
		}

		return array;
	}

	public int getNoOfVertex() {
		return vertex;
	}

}

class Node {
	int obj;
	Node next;

	public Node(int obj, Node next) {
		this.obj = obj;
		this.next = next;
	}
}

class Queue1 {
	Node top;
	int size;
	Node bottom;

	public void Enqueue(int obj) {
		Node temp = new Node(obj, null);
		if (top == null) {
			top = temp;
			bottom = temp;
			size++;
		} else {
			bottom.next = temp;
			bottom = bottom.next;
			size++;
		}
	}

	public int Dequeue() {
		int temp;
		if (top != null) {
			temp = top.obj;
			top = top.next;
			size--;
			return temp;
		} else {
			size = 0;
			return -1;
		}
	}

	public boolean isEmpty() {
		if (size == 0) {
			return true;
		} else {
			return false;
		}
	}
}

class BFS {
	public void bfs(int[][] graph) {
		int graphLength = graph.length;
		Vertex[] v = new Vertex[graphLength];
		for (int i = 0; i < graphLength; i++) {
			v[i] = new Vertex();
			v[i].color = 0;
			v[i].d = -1;
			v[i].prev = -1;
		}
		int s = 0;
		v[s].color = 1;
		v[s].d = 0;
		System.out.println("For Vertex " + s + "  " + v[s].d);
		v[s].prev = -1;
		Queue1 q = new Queue1();
		q.Enqueue(s);
		while (!q.isEmpty()) {
			int i = q.Dequeue();
			for (int j = 0; j < graph.length; j++) {
				if (graph[i][j] == 1) {
					if (v[j].color == 0) {
						v[j].color = 1;
						v[j].d = v[i].d + 1;
						System.out.println("For Vertex " + j + "  " + v[j].d);
						v[j].prev = i;
						q.Enqueue(j);
					}
				}
			}
			v[i].color = 2;
		}
	}

}

class Vertex {
	int color;
	int d;
	int prev;
	int time;
}

public class TesterBfs {

	/**
	 * @param args
	 *            the command line arguments
	 * @throws java.io.FileNotFoundException
	 */
	public static void main(String[] args) throws FileNotFoundException {
		// TODO code application logic here
		BFS b1 = new BFS();
		GraphInput gi = new GraphInput();
		int a[][] = gi.giveInput();
		b1.bfs(a);
	}

}
